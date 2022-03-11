<div class="container border">
  <div class="row d-flex justify-content-between m-3 p-1" >
    <div class="col-md-3">
      <form action={{ route("sorting" )}} method="POST">
        @csrf
        <select name="sort" id="sort">
          <option value="oldest" selected> older_to_ealier </option>
          <option value="newest"> newest </option>
          <option value="byBestOpinion"> by best opinion </option>
          <option value="byWortsOpinion"> by worst Opinion </option>
        </select>
        <button type="submit" class="btn border"> 
          OK
        </button>
      </form>
    </div>
  </div>
</div>