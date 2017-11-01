    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	



@section('sidebar')
{!! Html::script('assets/js/jquery-3.2.1.js'); !!}
<script type="text/javascript">
    $(document).ready(
        function(e) {
            $('#nav').on(
                'click', 
                'li', 
                function(e) {
                    e.preventDefault();
                    $('#nav li.active').removeClass('active');
                    $(this).addClass('active');
                }
            );

            $('#nav').on(
                'click', 
                '#userli', 
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('homeuser'); ?>"
                    );
                }
            );

            $('#nav').on(
                'click', 
                '#mapli', 
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(  ///nombre ruta
                        "<?php echo url('jugadorescercanos'); ?>"
                    );
                }
            );

            $('#nav').on(
                'click', 
                '#partli', 
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('crearpartido'); ?>"
                    );
                }
            );

            $('#nav').on(
                'click', 
                '#torli', 
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('creacapeonato'); ?>"
                    );
                }
            );

            $('#nav').on(
                'click', 
                '#infouser', 
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('infouser'); ?>"
                    );
                }
            );
            $('#nav').on(
                'click', 
                '#recin', 
                function(e) {
                    e.preventDefault();
                    $('#content').empty();
                    $('#content').load(
                        "<?php echo url('recintos'); ?>"
                    );
                }
            );
        }
    );
</script>
<div class="sidebar-wrapper" style="width: 100%;">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>














    
@endsection