<?php

namespace App\Http\Controllers\DashboardFreeWifi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoogleStationController extends Controller
{   
    private $production = false; // <--- Environment
    
    private $aliceConnection = "";
    private $freeWifiConnection = "";
    
    public function __construct() {
        $this->aliceConnection = $this->production ? 'cloudalice' : 'LocalAlice';
        $this->freeWifiConnection = $this->production ? 'freewifi_data' : 'LocalFreeWifi';
    }

    public function Index()
    {
        return view("hostpots.index");
    }

    public function getRealms()
    {
        $resultSet = DB::connection($this->aliceConnection)->select("SELECT id, name as nombre FROM cadenas");
        return response()->json($resultSet);
    }
    
    public function getRealmSites( Request $request )
    {
        $realmID = $request->realmID;
        if( $realmID == 0 ) {
            $resultSet = DB::connection($this->aliceConnection)->select("SELECT id,Nombre_hotel as nombre FROM hotels");
        } else {
            $resultSet = DB::connection($this->aliceConnection)->select("SELECT id,Nombre_hotel as nombre FROM hotels WHERE cadena_id = ?", [$realmID]);
        }
        return response()->json( $resultSet );
    }

    public function getChartsInfo( Request $request ) {
        $data = base64_decode($request->data);
        $data = json_decode($data);
        $dataset = [];
        switch( intval($data->option) ) {
            case 0:
                foreach( $data->sites as $id) {
                    $resultSet = DB::connection($this->freeWifiConnection)->select('CALL get_user_login_day_chain_venue(?, ?, ?,?)',[intval($data->chain), intval($id), $data->dateStart, $data->dateEnd]);
                    array_push($dataset, [
                        'site' => DB::connection($this->aliceConnection)->select("SELECT Nombre_hotel as nombre FROM hotels WHERE id = ?", [$id])[0]->nombre,
                        'data' => $resultSet
                    ]);
                }
            break;
            case 1:
                foreach( $data->sites as $id) {
                    $resultSet = DB::connection($this->freeWifiConnection)->select('CALL get_unique_user_day_chain_venue(?, ?, ?,?)',[intval($data->chain), intval($id), $data->dateStart, $data->dateEnd]);
                    array_push($dataset, [
                        'site' => DB::connection($this->aliceConnection)->select("SELECT Nombre_hotel as nombre FROM hotels WHERE id = ?", [$id])[0]->nombre,
                        'data' => $resultSet
                    ]);
                }
            break;
            case 2:
                foreach( $data->sites as $id) {
                    $resultSet = DB::connection($this->freeWifiConnection)->select('CALL get_new_user_day_chain_venue(?, ?, ?,?)',[intval($data->chain), intval($id), $data->dateStart, $data->dateEnd]);
                    array_push($dataset, [
                        'site' => DB::connection($this->aliceConnection)->select("SELECT Nombre_hotel as nombre FROM hotels WHERE id = ?", [$id])[0]->nombre,
                        'data' => $resultSet
                    ]);
                }
            break;

            case 3: // DOWNLOAD MB
                foreach( $data->sites as $id) {
                    $resultSet = DB::connection($this->freeWifiConnection)->select('CALL get_mb_download_chain_venue(?, ?, ?,?)',[intval($data->chain), intval($id), $data->dateStart, $data->dateEnd]);
                    array_push($dataset, [
                        'site' => DB::connection($this->aliceConnection)->select("SELECT Nombre_hotel as nombre FROM hotels WHERE id = ?", [$id])[0]->nombre,
                        'data' => $resultSet
                    ]);
                }
            break;

            case 4: // UPLOAD MB
                foreach( $data->sites as $id) {
                    $resultSet = DB::connection($this->freeWifiConnection)->select('CALL get_mb_upload_chain_venue(?, ?, ?,?)',[intval($data->chain), intval($id), $data->dateStart, $data->dateEnd]);
                    array_push($dataset, [
                        'site' => DB::connection($this->aliceConnection)->select("SELECT Nombre_hotel as nombre FROM hotels WHERE id = ?", [$id])[0]->nombre,
                        'data' => $resultSet
                    ]);
                }
            break;
            case 5: // AVG SESSION DURATION
                foreach( $data->sites as $id) {
                    $resultSet = DB::connection($this->freeWifiConnection)->select('CALL get_avg_min_session_chain_venue(?, ?, ?,?)',[intval($data->chain), intval($id), $data->dateStart, $data->dateEnd]);
                    array_push($dataset, [
                        'site' => DB::connection($this->aliceConnection)->select("SELECT Nombre_hotel as nombre FROM hotels WHERE id = ?", [$id])[0]->nombre,
                        'data' => $resultSet
                    ]);
                }
            break;
            case 6: // DAILY REVENUE ESTIMATE
                foreach( $data->sites as $id) {
                    $resultSet = DB::connection($this->freeWifiConnection)->select('CALL get_revenue_total_session_chain_venue(?, ?, ?,?)',[intval($data->chain), intval($id), $data->dateStart, $data->dateEnd]);
                    // $resultSet = DB::connection($this->freeWifiConnection)->select('CALL get_revenue_total_session_chain_venue(?, ?, ?,?)',[112,68,'2019-03-17','2020-04-27']);
                    array_push($dataset, [
                        'site' => DB::connection($this->aliceConnection)->select("SELECT Nombre_hotel as nombre FROM hotels WHERE id = ?", [$id])[0]->nombre,
                        'data' => $resultSet
                    ]);
                }
            break;
            default: $dataset = []; break;
        }
        return response()->json( $dataset );
    }

}

