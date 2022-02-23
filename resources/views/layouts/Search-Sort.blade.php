<div class="container border">
  <div class="row d-flex justify-content-between m-3 p-1" >
  
      {{-- <div class="container col-md-8">
          Dodaj Skladnik:<br/>
          <input type="search" class="col-md-3">
          <button type="submit" class="btn border col-md-1">
            <i class="bi bi-plus"></i>
          </button>
      </div> --}}
  
      <div class="container col-md-3 ">
        <input type="search" class="search"> 
        <button type="submit">
          <i class="bi bi-search"></i>  <br>
        </button>
          sort by: <br/>
        <?php
        $selected="dateAsscending"; // rosnąco
        $options = array("dateAsscending","dateDescending");
        
          echo '<select name="Order" id="order-by" class="bg-light">'
            foreach( $options as $option )
            {
              if( $selected == $option )
              {
                echo "<option selected ='selected' value="$option">$option opinia</option>"
              }else {
                echo "<option value="$option">$option Najnowsze</option>";
              }
            
            }
          echo "</select>";
        ?>
      </div>
  
  </div>
    {{-- <div class="row border ">
      <div class="container col-md-1 bg-dark text-own-yellow m-1 border rounded-3">
        carrot
      </div>
      <div class="container col-md-1 bg-dark text-own-yellow m-1 border rounded-3">
        onion
      </div>
    </div> --}}
</div>