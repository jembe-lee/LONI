<?php

namespace Tests\Unit;

use Tests\TestCase;
use JWTAuth;

class ArticleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testSingleArticleTest()
    {


        $dataTest = [
        "id"=> "5",
        "title"=> "Ut alias quibusdam praesentium cupiditate atque facilis dolores dicta ratione.",
        "body"=> "Rerum iste delectus exercitationem culpa commodi dolores adipisci dolor omnis ea quidem eos esse voluptatem sequi sed natus laborum blanditiis qui nobis esse minus ducimus voluptatibus quam illum quia et beatae dolorum minima quae molestias sint ut sit consequatur quidem eos odit sapiente omnis soluta minus accusamus necessitatibus perferendis distinctio harum officiis aperiam dicta aliquam dolor ullam est unde sed sed cum.",
        "created_at"=> "2020-01-14 10:29:42",
        "updated_at"=> "2020-01-14 10:29:42"
        ];
        $user = factory(\App\User::class)->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token
        ])->json('GET', 'api/articles/5');

        $response->assertJson(["article" => $dataTest]);
    }

    public function testArticleListTest()
    {
        $user = factory(\App\User::class)->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token
        ])->json('GET', 'api/articles/');

        $response->assertStatus(200);

    }

    public function testCreateArticleTest()
    {
        $user = factory(\App\User::class)->create();
        $token = JWTAuth::fromUser($user);

        $data = [
            "title" => "i only love jembe boss",
            "body" => "is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, ",
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST', 'api/articles/', $data);

        $response->assertStatus(302);
    }
}
