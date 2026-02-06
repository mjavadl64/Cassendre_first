<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Entity\Role;
use Doctrine\ORM\EntityManagerInterface;
use Dom\Entity;


#[AsCommand(
    name: 'app:create-role',
    description: 'Add a short description for your command',
)]

class CreateRoleCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $role,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::REQUIRED, 'Name of the role ex: ROLE_ADMIN')
            ->addArgument('description', InputArgument::OPTIONAL, 'Description of the role')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $name = (string) $input->getArgument('name');

        $role = new Role();
        $role->setName($name);
        $description = (string) $input->getArgument('description');
        $role->setDescription($description);
        
        $this->role->persist($role);
        $this->role->flush();

        return Command::SUCCESS;
    }
}