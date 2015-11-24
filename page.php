<?php

/* Pagination Logic for Search */


                    class pagination {
                      
                      private $connection;
                      private $query = $query;
                      // Defuault Result Limit
                      private $results_per_page = 10;
                      private $current_page = 1;
                      private $total_results = 0;
                      private $total_pages;
                      private $results; 

                       
                      public function __construct( $conn, $query, $results_per_page, $current_page ) {
                        // check for input error validation here.
					    $this->connection = $conn;
					    $this->query = $query;
					    if ( $results_per_page )
					      $this->results_per_page = $results_per_page;
					    if ( $current_page )
					      $this->current_page = $current_page;
					    $results = $this->connection->query( $this->query );
					    $this->total_results = $results->num_rows;
					    $this->total_pages = ($this->total_results/$this->results_per_page) + 1;

    				  }

    				  public function paginate () {
    				  	return pagination_logic();
    				  }

    				  private function pagination_logic() {
    				  	    
    				  	    $html = "";

		                    if ( $this->current_page <= $this->total_pages ) {
		 						
		 						if ($this->current_page = 1)
		 							$back = "";
		 						else
		 							$back = "<a href='?page_id=".($page_number-1)."'></a>";
		 						
		 						if($this->current_page = $this->total_pages)
		 							$next = "";
		                        else
		                        	$back = '<a href="?page_id='.($page_number+1).'"></a>';

		                        for ( $i = ($this->current_page-1)*$this->results_per_page; $i < $this->current_page*$this->results_per_page; $i++ ) {
		                        	if ($this->results[$i])
		                                $this->html =  $this->html."<div>".$this->results[$i]['name']."</div>";
		                        }

		                        return $html;
		                      } 


    				  } 
 
                  
                    }

                    $page = $_GET["page_id"];

                    $obj = new $pagination($conn, $query, 15, $page);

                    $obj->paginate();
                    

                

                  

                    

                   

                   




?>
