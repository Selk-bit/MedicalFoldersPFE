<!-- <h6>Conseil</h6>
<table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Conseil</th>
        </tr>
    </thead>
    <tbody id="conseilcontent"></tbody>
</table> -->

<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Conseil</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="conseilcontent">
  @isset($Conseil)
  @foreach ($Conseil as $key => $item)
  @if($item->isDeleted == 0)
  <tr class="trcn">
  <td data-label='ID'><input id="m" value="{{$item->id}}" disabled></td>
  <td data-label='Conseil'><audio controls><source src="{{$item->conseil}}" type="audio/ogg" ></audio></td>
  <td data-label='Action'><button class="btnscn btn btn-outline-danger">Supprimer</button></td>
  </tr>
  @endif
  @endforeach	
  @endisset
  </tbody>
</table>