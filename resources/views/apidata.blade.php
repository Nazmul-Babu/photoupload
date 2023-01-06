<html>
    <head>
        <title>helo api</title>

    </head>
    <body>
        <button id="getdata">get</button>
        <h3>test api</h3>
        <div id="renderdata" style="border: 1px solid black">
            <h1 id="name">babu</h1>
            <h3 id="phone">
                0130
            </h3>
            <img src="" alt="" height="100px" width="100px" id="image">
        </div>
        {{-- <form action="https://randomuser.me/api/" method="GET">
            <input type="submit" value="submit">
        </form> --}}
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $("#getdata").click(function(){
                getajax()
            })

        });
        function getajax(){
            $.ajax({
            url:'https://randomuser.me/api/?gender=female/?nat= IR',
            datatype:'json',
            // type="GET",
            success:function(response){
                let data=response.results[0];
                // console.log(response);
                $("#name").html(data.name.first+""+data.name.last);
                $("#phone").html(data.phone);
                $("#image").attr("src",data.picture.medium);
                console.log(response);
            },
            error:function(error){
                console.log(error);

            }
          })
        }
    </script>
    </body>


</html>
