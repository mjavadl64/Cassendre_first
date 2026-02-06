<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Entity\User;
use App\Entity\Role;
use Doctrine\ORM\EntityManagerInterface;
use Dom\Entity;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'Crée un utilisateur avec un mot de passe hashé et des rôles.',
)]
class CreateUserCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email de l’utilisateur')
            ->addArgument('password', InputArgument::REQUIRED, 'Mot de passe en clair (sera hashé)')
            ->addArgument('role', InputArgument::REQUIRED, 'Rôle de l’utilisateur
            
            
            (ex: ROLE_ADMIN)')
            ->addArgument('first_name', InputArgument::REQUIRED, 'Prénom de l’utilisateur')
            ->addArgument('last_name', InputArgument::REQUIRED, 'Nom de l’utilisateur')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $email = (string) $input->getArgument('email');
        $plainPassword = (string) $input->getArgument('password');
        $roleString = (string) $input->getArgument('role');
        $first_name = (string) $input->getArgument('first_name');
        $last_name = (string) $input->getArgument('last_name');

        $user = new User();
        $user->setEmail($email);
        
        $user->setFirstName($first_name);
        $user->setLastName($last_name);
        $user->setCreateAt(new \DateTimeImmutable());
        
        // Le mot de passe est hashé avant l’enregistrement.
        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);

        //recupere les role dans la base de données
        $roleRepository = $this->em->getRepository(Role::class);
        $role = $roleRepository->findOneBy(['name' => $roleString]);
        $user->setRole($role);

        // persist = Doctrine prépare l’insertion
        // flush = Doctrine exécute réellement l’insertion en base
        $this->em->persist($user);
        $this->em->flush();

        $output->writeln('Utilisateur créé : '.$email);
        //$output->writeln('Voici le mot de passe : '.$plainPassword);
        //$output->writeln('Voici le hash : '.$hashedPassword);
        $output->writeln('Rôles : '.$roleString);
        
        return Command::SUCCESS;
    }
}
