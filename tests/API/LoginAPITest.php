<?php

namespace Tests\API;

use Tests\HttpClient;
use PHPUnit\Framework\TestCase;

static $csrfToken = null;

class LoginAPITest extends TestCase
{
    use HttpClient;

    /**
     *  @return void
     */
    public function testGetCsrfToken(): void
    {
        global $csrfToken;

        /**
         *  Get CSRF token.
         */
        $o = $this->_exec("http://127.0.0.1:8000/api/get_csrf");
        $this->assertEquals($o["info"]["http_code"], 200);
        $o = json_decode($o["out"], true);
        $csrfToken = $o["token"];
    }

    /**
     * @return void
     */
    public function testLogin(): void
    {
        global $csrfToken;

        $o = $this->_exec("http://127.0.0.1:8000/api/admin/login",
            [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query(
                    [
                        "email" => "admin",
                        "password" => "admin",
                        "_token" => $csrfToken
                    ]
                ),
                CURLOPT_HTTPHEADER => ["Accept: application/json"]
            ]
        );
        $o = json_decode($o["out"], true);
        $this->assertEquals($o["status"], "login_ok");
    }
}
