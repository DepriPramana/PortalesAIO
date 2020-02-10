<!DOCTYPE html>
<html>
<head>
	<title>{{$site_name}}</title>
	<!-- conseguir favicon de jamaicapalace. -->
	<!-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon.ico') }}">  -->
</head>
<body>
	<!-- <form id="loginform" name="loginform" method="POST" action="https://{{$sip}}:9998/SubscriberPortal/hotspotlogin">	 -->
	<form id="loginform" name="loginform" method="POST" action="http://{{$sip}}:9997/login">
		{{ csrf_field() }}
		<input class="form-control" type="hidden" id="username" name="username" value="{{$username}}" />
		<input class="form-control" type="hidden" id="password" name="password" value="{{$password}}" />
		<input class="form-control" type="hidden" id="sip" name="sip" value="{{ $sip }}" />
		<input class="form-control" type="hidden" id="proxy" name="proxy" value="{{ $proxy }}" />
		<input class="form-control" type="hidden" id="mac" name="mac" value="{{ $mac}}" />
		<input class="form-control" type="hidden" id="client_mac" name="client_mac" value="{{$client_mac}}" />
		<input class="form-control" type="hidden" id="uip" name="uip" value="{{ $uip }}" />
		<input class="form-control" type="hidden" id="ssid" name="ssid" value="{{ $ssid }}" />
		<input class="form-control" type="hidden" id="url" name="url" value="{{ $url }}" />
		<input class="form-control" type="hidden" id="vlan" name="vlan" value="{{ $vlan }}" />
		<!-- <button type="button" id="btn_logeo" name="btn_logeo">submit</button> -->
	</form>
</body>
@include('visitor.scripts')
<script>
	$(function() {
		setTimeout(function(){
			$('#loginform').submit();
		}, 2000);
	});
	$('#btn_logeo').on('click', function(){
		$('#loginform').submit();
	});
</script>
</html>