<div class="container">
    <h1> Get Data from Server over Ajax </h1>
    <textarea id="text" readonly>
    </textarea>
    <br/>
    <button id="button">
        Get Time from Server
    </button>
    <script>
        $(document).ready(function() {
            $("#button").click(function() {
                $.get("master/Time/getTime", function(time1) {
                    $("#text").html("Time on the server is:" + time1);
                });
            });
        });
    </script>
</div>

