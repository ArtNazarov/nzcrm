<?php
namespace App\Other;

error_reporting(E_ALL);
ini_set('display_errors', 1);
 

require_once(__DIR__ . '/calendar_helpers.php');



class WidgetCalendar {

    public $cal;
    public $year;
    public $records;
    public $date_field;
    public $cap_field;
    public $link;
    
    public function __construct($year, $records, $date_field, $cap_field, $link) {
        $this->cal = [];
        $this->year = $year;
        $this->records = $records;
        $this->date_field = $date_field;
        $this->cap_field = $cap_field;
        $this->link = $link;
    }
    
    function year_addFromDb(){
    
        $date_field = $this->date_field;
        $cap_field = $this->cap_field;
        $link = $this->link;
        
    foreach ($this->records as $record)
     {
        
        
        $date = $record->$date_field;
        $id = $record->id;
        $situation = mb_substr($record->$cap_field, 0, 16);
        $month = intval( date('n', strtotime($record->$date_field)) );
       // print_r($month);
        $place = getWeekday($date);
        $index_of_row=weekOfMonth($date);
        $append = "<a href=$link/$id>$situation</a><br/>";
        if (isset( $this->cal[$month-1][$index_of_row][$place]['text'] )){
        $this->cal[$month-1][$index_of_row][$place]['text'] .= $append;
            } else { $this->cal[$month-1][$index_of_row][$place]['text'] = $append;};
    }
  
    
}

function year_calendar(){
  
    
  
    
    $calendar = [];
    
    for ($month_index=0;$month_index<12;$month_index++){
                $calendar[$month_index] = [];
                $month = $month_index + 1;
                $days = cal_days_in_month(CAL_GREGORIAN, $month_index+1, $this->year);
                $rows = ceil($days / 7)+1;
                
                // Init widget  
                        $index_of_row = 0;
                        for($r=0;$r<$rows;$r++){
                            $calendar[$month_index][$r] = [];
                            for($d=0;$d<8;$d++){
                                $calendar[$month_index][$r][$d] = ["text"=>"", 
                                    'date' => ''];
                            };
     };

$this->cal = $calendar;
  

        }





 

$index_of_row = 0;

$year = $this->year;


for ($month=1;$month<13;$month++){
     $month_index = $month - 1;
     $days = cal_days_in_month(CAL_GREGORIAN, $month, $this->year);
            for($i=1;$i<=$days;$i++){

                $date =  "$year-$month-$i";
                $place = getWeekday($date);
                $index_of_row=weekOfMonth($date);
                    $this->cal[$month_index][$index_of_row][$place] = ['date' => $date, "text"=>""];
	}
};

         
    $this->year_addFromDb();
    
      
}

function year_empty_row($month_index){
    $empty = true;
    // print_r($cal[1]);
    //print_r($cal[1][0]);
    for ($i=0;$i<7  ;$i++){
        $empty = (!isset($this->cal[$month_index][1][$i]['date']))&&($empty);
    };
    return $empty;
}

function widget(){
    
  $daynames = [ "Пн", "Вт",
  "Ср", "Чт", "Пт", "Сб", "Вс"];
  $month_names = ['Январь', 'Февраль', 'Март',
  'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
      'Октябрь', 'Ноябрь', 'Декабрь'];
  // $month_names
  
  $this->year_calendar();

  
  $year = $this->year;
  
  
  $year_html = "";
  for ($month_index = 0;$month_index<12;$month_index++) {
      $mn = $month_index+1;
      $html = "<table border='1'><h2>$year/$mn $month_names[$month_index]</h2>";
      for ($r = 0; $r < count($this->cal[$month_index]); $r++) {
          $html .= "<tr>";
          if ($r == 0) {

              for ($d = 0; $d < count($daynames); $d++) {
                  $html .= "<td>" . $daynames[$d] . "</td>";
              };

          };
          if (($r==1)&&($this->year_empty_row($month_index))){continue;};
          if ($r > 0) {
              for ($d = 0; $d < count($daynames); $d++) {

                  $style = "";
                  if ($d > 5) {
                      $style = " style=' background-color:#ff0000;' ";
                  }
                  
                  $month = $month_index + 1;
                  $date = @$this->cal[$month_index][$r][$d]["date"];
                  
                  $link_for_adding = " <br/>";


                  if (isset($this->cal[$month_index][$r][$d]['text'])) {
                      
                       
                  if ($this->cal[$month_index][$r][$d]['text'])
                      { $style = " style=' background-color:#00ff00;' ";};
                  };

                  if (isset($this->cal[$month_index][$r][$d]["date"])) {
                      $html .= "<td $style>" . $link_for_adding . $this->cal[$month_index][$r][$d]["date"] . "<br/>" . 
                              $this->cal[$month_index][$r][$d]['text']   .  "</td>";
                  } else {
                      $html .= "<td $style> - </td>";
                  };

              };
          };
          $html .= "</tr>";
      };
      $html .= "</table>";
      $year_html .= $html;
  };
  return $year_html;
}

}



?>