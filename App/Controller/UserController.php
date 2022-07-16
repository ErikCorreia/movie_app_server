<?php

namespace App\Controller;

use Entity\Users;

class UserController {
    public function index() {
        require_once __DIR__ . '/../../bootstrap.php';

        $users = $entityManager->getRepository(Users::class)->findAll();
        
        foreach ($users as $user) {
            echo $user->getName() . '<br>';
        }
    }

    public function getUsers($request, $response) {
        require_once __DIR__ . '/../../bootstrap.php';

        $data = $request->getParsedBody();
        // return json_encode($data);
        
        $email = $data['params']['email'];
        $password = $data['params']['password'];       

        $user = $entityManager->getRepository(Users::class)->findOneBy(['email' => $email, 'password' => $password]);
        
        if ($user) {

            $user = [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
            ];

            $userData = [
                'status' => 'success',
                'user' => $user,
            ];

            return json_encode($userData);

        } else {
            return json_encode(
                array(
                    'status' => 'error',
                    'message' => 'User not found'
                )
            );
        }
        
    }

    public function createUser($request, $response) {

        $data = $request->getParsedBody();

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        require_once __DIR__ . '/../../bootstrap.php';

        $user = new Users();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);

        $entityManager->persist($user);
        $entityManager->flush();

        $res = [
            'status' => 'success',
            'message' => 'User created successfully',

            'data' => [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword()
            ]
        ];

        return json_encode($res);
    }
}