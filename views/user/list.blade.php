@layout('fluxbb::layout.main')

@section('main')
<div class="linkst">
	<div class="inbox">
		<p class="pagelink"><span class="pages-label">Pages: </span><strong class="item1"><?php echo $users->links(); ?></strong></p>
		<div class="clearer"></div>
	</div>
</div>
	<h2><span>User list</span></h2>
<div id="users1" class="blocktable">
	<div class="box">
		<div class="inbox">
			<table cellspacing="0">
			<thead>
				<tr>
					<th class="tc2" scope="col">Username</th>
					<th class="tc2" scope="col">Title</th>
					<th class="tc3" scope="col">Posts</th>
					<th class="tcr" scope="col">Registered</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($users->results as $user): ?>
				<tr>
					<td class="tcl">{{ HTML::link_to_action('fluxbb::user@profile', $user->username, array($user->id)) }}</td>
					<td class="tc2">{{$user->title}}</td>
					<td class="tc3">{{$user->num_posts}}</td>
					<td class="tcr"><?php echo HTML::format_time($user->registered, true) ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
@endsection