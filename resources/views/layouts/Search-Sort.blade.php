<div class="container border">
  <div class="row d-flex justify-content-between m-3 p-1" >
    <div class="col-md-3">
      <form action={{ route("sorting" )}} method="POST">
        @csrf
        <select name="sort" id="sort">
          <option value="oldest" selected> older_to_ealier </option>
          <option value="newest"> newest </option>
          <option value="price"> price </option>
          <option value="taste"> taste </option>
          <option value="speed"> speed </option>
        </select>
        <button type="submit" class="btn border"> 
          OK
        </button>
      </form>
    </div>
  </div>
</div>