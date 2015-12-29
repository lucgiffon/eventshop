<a href="event/{{ $id }}">
	<div class="col-md-{{$col_md}} col-sm-{{$col_sm}}">
		 <div class="card-container">
			<div class="card">
				<div class="front">
					<div class="cover">
						<img src="{{$image}}"/>
					</div>
					<div class="user">
						<img class="img-circle" src="{{$logo}}"/>
					</div>
					<div class="content">
						<div class="main">
							<h3 class="name">{{$title}}</h3>
							<p class="profession">{{$subTitles}}</p>
							<h5><i class="fa fa-map-marker fa-fw text-muted"></i> {{$eventAddr}}</h5>
							<h5><i class="fa fa-building-o fa-fw text-muted"></i> {{$eventCompany}}</h5>
							<h5><i class="fa fa-envelope-o fa-fw text-muted"></i> {{$eventEmail}}</h5>
						</div>
						<!--<div class="footer">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div> -->
					</div>
				</div> <!-- end front panel -->
				<div class="back">
					<div class="header">
						<h5 class="motto">{{ $eventMessage }}</h5>
					</div>
					<div class="content">
						<div class="main">
							<p class="frontmess">{!! str_limit($frontMess1, $limit = 200) !!}</p>
						</div>
					</div>
					<div class="footer">
					</div>
				</div> <!-- end back panel -->
			</div> <!-- end card -->
		</div> <!-- end card-container -->
	</div> <!-- end col sm 3 -->
</a>
			