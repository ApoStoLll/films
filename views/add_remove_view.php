
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script>

function sendAjax(url, data, success){
  $.ajax({
    url: url,
    type: 'POST',
    dataType: 'json',
    data: data,
    success: success
  })
}

function form_data(form){
  data = {}
  $.each( form.serializeArray(), function(i, e) {
    data[e.name] = e.value
  })
  console.log(data)
  return data
}

$(document).ready(() => {

  $('#form_add').on('submit', function() {
    event.preventDefault()
    formAdd = $(this)
    dataAdd = form_data(formAdd)
    sendAjax(formAdd.attr('action'), dataAdd, function(json){
      alert('added')
    })
  })

  $('#form_remove').on('submit', function() {
    event.preventDefault()
    formRemove = $(this)
    dataRemove = form_data(formRemove)
    sendAjax(formRemove.attr('action'), dataRemove, function(json){
      alert('removed')
    })
  })

})
</script>
<!-- src="js/add_remove_ajax.js" !-->
<div id='add'>
  <p> Add </p>
  <form action="add/" method="post" id='form_add'>
    <p> Title: <input type="text" name="title" /> </p>
    <p> Year: <input type="number" name="year" /> </p>
    <p> Format: <input type="text" name="format" /> </p>
    <p> Stars: <input type="text" name="stars" /> </p>
    <input type="submit" value="Add" />
  </form>
</div>

<div id='remove' >
  <p> Remove </p>
  <form action="remove/" method="post" id='form_remove'>
    <p> Title : <input type="text" name="title" /> </p>
    <input type="submit" value="Remove" />
  </form>

<div id="result_form"></div>
