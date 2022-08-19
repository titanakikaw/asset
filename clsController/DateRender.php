<?php

function DateRender($start, $end, $count)
{
   $count = ($count != '') ? $count : '1';
   $diff_types = ['Y', 'M'];
   $data = [];
   $data['year'] = [];
   $data['month'] = [];
   $data['month'] = [];
   echo '<pre>';
   foreach ($diff_types as $key => $value) {
      $diff_ctr = "P" . $count . $value;
      $rendered = new DatePeriod(
         new DateTime('2016-06-06'),
         new DateInterval($diff_ctr),
         new DateTime('2021-06-06')
      );
      foreach ($rendered as $key => $value2) {
         switch ($value) {
            case 'Y':
               array_push($data['year'], $value2->format('Y'));
            case 'M':
               array_push($data['month'], $value2->format('M'));
            default:
               // array_push($data, $value2->format('Y-m-d'));
         }
      }
   }
   var_dump($data);
}
