@layout('fluxbb::layout.main')

@section('main')
<div id="searchform" class="blockform">
	<h2><span>Search</span></h2>
	<div class="box">
		<form id="search" method="get" action="search.php">
			<div class="inform">
				<fieldset>
					<legend>Enter your search criteria</legend>
					<div class="infldset">
						<input type="hidden" name="action" value="search">
						<label class="conl">Keyword search<br><input type="text" name="keywords" size="40" maxlength="100"><br></label>
						<label class="conl">Author search<br><input id="author" type="text" name="author" size="25" maxlength="25"><br></label>
						<p class="clearb">To search by keyword, enter a term or terms to search for. Separate terms with spaces. Use AND, OR and NOT to refine your search. To search by author enter the username of the author whose posts you wish to search for. Use wildcard character * for partial matches.</p>
					</div>
				</fieldset>
			</div>
			<div class="inform">
				<fieldset>
					<legend>Select where to search</legend>
					<div class="infldset">
						<div class="conl multiselect">Forum
						<br>
						<div class="checklist">
							<fieldset>
							@foreach ($categories as $category)
								<?php 
								$forums = $category->forums;
								?>
								<legend><span>{{ $category->cat_name }}</span></legend>
								@foreach ($forums as $forum)
								<?php $idSlugged = Str::slug($forum->forum_name, '-'); ?>
								<div class="checklist-item"><span class="fld-input"><input type="checkbox" name="forums[]" id="{{ $idSlugged }}" value="1"></span> <label for="{{ $idSlugged }}">{{ $forum->forum_name }}</label></div>
								@endforeach
							@endforeach
							</fieldset>
						</div>
						</div>
						<label class="conl">Search in
						<br><select id="search_in" name="search_in">
							<option value="0">Message text and topic subject</option>
							<option value="1">Message text only</option>
							<option value="-1">Topic subject only</option>
						</select>
						<br></label>
						<p class="clearl">Choose in which forum you would like to search and if you want to search in topic subjects, message text or both.</p>
						<p>If no forums are selected, all forums will be searched.</p>					</div>
				</fieldset>
			</div>
			<div class="inform">
				<fieldset>
					<legend>Select how to view search results</legend>
					<div class="infldset">
						<label class="conl">Sort by
						<br><select name="sort_by">
							<option value="0">Post time</option>
							<option value="1">Author</option>
							<option value="2">Subject</option>
							<option value="3">Forum</option>
						</select>
						<br></label>
						<label class="conl">Sort order
						<br><select name="sort_dir">
							<option value="DESC">Descending</option>
							<option value="ASC">Ascending</option>
						</select>
						<br></label>
						<label class="conl">Show results as
						<br><select name="show_as">
							<option value="topics">Topics</option>
							<option value="posts">Posts</option>
						</select>
						<br></label>
						<p class="clearb">You can choose how you wish to sort and show your results.</p>
					</div>
				</fieldset>
			</div>
			<p class="buttons"><input type="submit" name="search" value="Submit" accesskey="s"></p>
		</form>
	</div>
</div>
@endsection