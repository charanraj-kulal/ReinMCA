<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    public function sendGridConfig()
    {
        return [
            'url' => 'https://api.sendgrid.com/',
            'api_key' => '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' // Change this to your actual API key
        ];
    }

    public function emailTrigger($payload)
    {
        $config = $this->sendGridConfig();
     
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.sendgrid.com/v3/mail/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $config['api_key'],
                'Content-Type: application/json'
            ],
        ]);
        
        $response = curl_exec($curl);
        curl_close($curl);
    }

    public function emailToEmployee($data)
    {
        $template = $data['body'];
        $params = [
            'personalizations' => [
                [
                    'to' => [
                        ['email' => $data['to']]
                    ],
                    'subject' => $data['subject']
                ]
            ],
            'from' => [
                'email' => 'chethan@kiran.in'
            ],
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $template
                ]
            ]
        ];
    
        $this->emailTrigger($params);
    }
    
    public function emailForPasswordReset($data, $user)
    {
        $template = $data['body'];
        
        $params = [
            'personalizations' => [
                [
                    'to' => [
                        ['email' => $user['email']]
                    ],
                    'subject' => $data['subject']
                ]
            ],
            'from' => [
                'email' => 'chethan@kiran.in'
            ],
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $template
                ]
            ]
        ];

        $this->emailTrigger($params);
    }
    
    public function emailToAdmin($data)
    {
        $template = $data['body'];
        
        $params = [
            'personalizations' => [
                [
                    'to' => [
                        ['email' => 'subhat95@gmail.com']
                    ],
                    'subject' => $data['subject']
                ]
            ],
            'from' => [
                'email' => 'chethan@kiran.in'
            ],
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $template
                ]
            ]
        ];

        $this->emailTrigger($params);
    }
}
