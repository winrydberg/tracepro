<?php

namespace App\Works;
use Illuminate\Support\Facades\Redis;
  class RedisQuery{

    public static function getTransactionInfo($transactionid){
      try {
        return Redis::hgetall($transactionid);
      } catch (\Exception $e) {
        return null;
      }
     
    }

    public static function saveToRedis($transactionid,$prop){
      try {
        return Redis::hmset($transactionid,$prop);
      } catch (\Exception $e) {
        return null;
      }
       
    }


}

?>
