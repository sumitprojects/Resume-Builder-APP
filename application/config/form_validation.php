<?php

$config = [
    'login' => [
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_emails',
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|max_length[50]',
        ],
    ],
    'register' => [
        [
            'field' => 'email',
            'label' => 'email',
            'rules' => 'trim|required|valid_emails|is_unique[tbl_user.user_email]',
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|max_length[50]',
        ],
        [
            'field' => 'mobile',
            'label' => 'mobile',
            'rules' => 'trim|required|regex_match[/[0-9]{10}/]',
        ]
    ],
];
