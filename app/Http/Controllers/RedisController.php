<?php

namespace App\Http\Controllers;

use Exception;
use Google_Client;
use Illuminate\Http\Request;

class RedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*
        * 1-NoSql Database
        * 2-in-memory data structure store
        * 3-used as a database, cache,
       */

//
//
            if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
                throw new Exception(sprintf('Please run "composer require google/apiclient:~2.0" in "%s"', __DIR__));
            }
            require_once __DIR__ . '/vendor/autoload.php';

            $client = new Google_Client();
            $client->setApplicationName('API code samples');
            $client->setScopes([
                'https://www.googleapis.com/auth/youtube.readonly',
            ]);

            // TODO: For this request to work, you must replace
            //       "YOUR_CLIENT_SECRET_FILE.json" with a pointer to your
            //       client_secret.json file. For more information, see
            //       https://cloud.google.com/iam/docs/creating-managing-service-account-keys
            $client->setAuthConfig('fi3QlTCWkyusSQUr97z0TsH6');
            $client->setAccessType('offline');

            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open this link in your browser:\n%s\n", $authUrl);
            print('Enter verification code: ');
            $authCode = trim(fgets(STDIN));

                  // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

             // Define service object for making API requests.
            $service = new Google_Service_YouTube($client);

            $queryParams = [
                'channelId' => 'UCxnUFZ_e7aJFw3Tm8mA7pvQ',
                'maxResults' => 10
            ];

            $response = $service->activities->listActivities('snippet', $queryParams);
            print_r($response);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
