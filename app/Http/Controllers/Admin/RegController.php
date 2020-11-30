<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected const CODE_VALIDATION_SUCCESS = 200;
    protected const CODE_VALIDATION_ERROR = 422;
    protected const CODE_MANY_REQUESTS = 429;
    protected const CODE_SUCCESS_UPDATED = 202;
    protected const CODE_SUCCESS_CREATED = 201;
    protected const CODE_SUCCESS_DELETED = 202;
    protected const CODE_UNAUTHORIZED = 401;
    protected const CODE_NOTFOUND = 404;
    protected const CODE_ACCESS_DENIED = 403;
    protected $client;

    public function __construct()
    {
            $this->headers = [
                'Accept'        => 'application/json',
                'Language'      => app()->getLocale()
            ];
        $this->client = new Client(['base_uri' => config('app.api_url')]);
    }

    public function index()
    {
        $client = new Client(['base_uri' => 'http://certificate.loc']);
        $response = $client->request('GET', 'api/reg');
        $regions = json_decode($response->getBody());
        return view('admin.reg.index',[
           'regions' => $regions->data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reg.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client(['base_uri' => 'http://certificate.loc/']);
        $request = $request->except('_token');
        $response = $client->request('POST','api/reg',['form_params' => $request, 'headers' =>$this->headers]);
        if($response ==true)
        {
            return redirect()->route('reg.index');
        }
        /*$client = new Client(['base_uri' => 'http://certificate.loc']);
        $request = $request->except('_token');
        $response = $client->request('POST','api/reg', ['form_params' => $request, 'headers' => $this->headers]);
        if($response->getStatusCode() == self::CODE_VALIDATION_SUCCESS || $response->getStatusCode() == self::CODE_SUCCESS_UPDATED || $response->getStatusCode() == self::CODE_SUCCESS_CREATED) {
            return redirect()->route('reg.index');
        }*/

        /*try {
            //dd($request->request);
            //dd($this->headers);
            $response = $this->client->request('POST','api/reg', ['form_params' => $request->all(), 'headers' => $this->headers]);
            if($response->getStatusCode() == self::CODE_VALIDATION_SUCCESS || $response->getStatusCode() == self::CODE_SUCCESS_UPDATED || $response->getStatusCode() == self::CODE_SUCCESS_CREATED) {
                return json_decode($response->getBody());
                }
        }*/ /*catch (\GuzzleHttp\Exception\RequestException $e) {
            return $this->errorResponse($e, $request);
        }*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new Client(['base_uri' => 'http://certificate.loc']);
        $response = $client->request('GET', 'api/regs/'.$id);
        $districts = json_decode($response->getBody());
        return view('admin.reg.show',[
            'districts' => $districts->data
        ]);
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

    private function errorResponse($e, $request) {
        switch ($e->getCode()){
            case self::CODE_VALIDATION_ERROR:
                if(Request::ajax()){
                    return json_decode($e->getResponse()->getBody());
                }
                return back()->withErrors(json_decode($e->getResponse()->getBody())->errors)->withInput($request)->send();
                break;
            case self::CODE_ACCESS_DENIED:
                return abort(403, __('admin.accessDenied'));
                break;
            case self::CODE_UNAUTHORIZED:
                return Redirect::to('/')->send();
                break;
            case self::CODE_NOTFOUND:
                return abort(404, 'page not found');
                break;
            case self::CODE_MANY_REQUESTS:
                return abort(429, 'to many requests');
                break;
            default:
                if(config('app.debug')){
                    dd($e->getCode(), json_decode($e->getResponse()->getBody()));
                }
                return abort(500);
                break;
        }

    }
}
