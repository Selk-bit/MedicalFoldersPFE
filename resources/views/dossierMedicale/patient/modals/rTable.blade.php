
<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titre</th>
      <th scope="col">Rapport</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="rcontent">
  @isset($rapport)
  @foreach ($rapport as $key => $item)
  @if($item->isDeleted == 0)
  <tr class="trr">
  <td data-label='ID'><input id="h" value="{{$item->id}}" disabled></td>
  <td data-label='Titre'><input value="{{$item->titre}}" class='t'></td>
  <td data-label='Rapport'><textarea class='d'>{{$item->description}}</textarea ></td>
  <td data-label='Action'><button class="btnsr btn btn-outline-danger">Supprimer</button></td>
  </tr>
  @endif
  @endforeach	
  @endisset
  </tbody>
</table>