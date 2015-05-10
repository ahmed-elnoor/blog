        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->


{{HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js')}}
{{HTML::script('css/bootstrap/js/bootstrap.min.js')}}
{{HTML::script('css/bootstrap/js/jquery.js ')}}

<script>

	$(document).ready(function(){
		$("#test").click(function(){
			$("#test2").toggle();
		}); 
	});

</script>



</body>

</html>
