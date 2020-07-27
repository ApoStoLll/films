
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

$(document).ready( () => {
  $("#form_search").on("submit", function(){
    event.preventDefault()
    form = $(this)
    data = {}
    $.each( form.serializeArray(), function(i, e) {
      data[e.name] = e.value
    })
    //console.log(data)
    sendAjax(form.attr('action'), data, function(json){
       console.log(json)
      // let obj = JSON.parse(json)
      // console.log(obj)
      json.forEach((item, i) => {
        $('#films').append('<p class=titles id=' + item.title + '>' + item.title + '</p>')
      })
      $('p').on("click", function(){
        //alert($(this).attr("id"))
        let show_data = {"title" : $(this).attr("id")}
        sendAjax("details", show_data, function(json){
          let str = "Title : " + json[0].title + "\n" + "Year : " + json[0].year + "\n"
          str += "Format : " + json[0].format + "\n" + "Stars : " + json[0].stars
          alert(str);
        })
      })
    })
  })

})

</script>

<form action="search" method="post" id="form_search">
  <input type="text" name="str" /> </br>
  <input type="radio" name="option" value="title" /> Title </br>
  <input type="radio" name="option" value="stars" /> Stars </br>
  <input type="submit" value="Search" />
</form>

<div id="films">

</div>
