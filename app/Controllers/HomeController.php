<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Request;
use App\Models\Course;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $topCourses = Course::getInstance()->query()->latest()->limit(3)->get();
        $trainers = User::getInstance()->trainer()->limit(4)->get();

        return $this->render('home', [
            'courses' => $topCourses,
            'trainers' => $trainers,
        ]);
    }

    public function sendEmail(Request $request)
    {
        $body = $request->getBody();
        $email = $body['email'];

        if ($email) {
            $to = $email;
            $subject = "Email";

            $message = "
                <html>
                <head>
                <title>HTML email</title>
                </head>
                <body>
                    <h4>Thank you for supporting us $email</h4>
                </body>
                </html>
            ";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <test@example.com>' . "\r\n";

            mail($to, $subject, $message, $headers);

            return $this->redirect('/');
        }

        return $this->redirect('/');
    }
}
