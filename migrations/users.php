<?php
/**
 * FluxBB - fast, light, user-friendly PHP forum software
 * Copyright (C) 2008-2012 FluxBB.org
 * based on code by Rickard Andersson copyright (C) 2002-2008 PunBB
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public license for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * @category	FluxBB
 * @package		Core
 * @copyright	Copyright (c) 2008-2012 FluxBB (http://fluxbb.org)
 * @license		http://www.gnu.org/licenses/gpl.html	GNU General Public License
 */

class Migration_Users
{

	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->create();

			$table->increments('id');
			$table->integer('group_id')->default(3);
			$table->string('username', 200)->default('');
			$table->string('password', 40)->default('');
			$table->string('email', 80)->default('');
			$table->string('title', 50)->nullable();
			$table->string('realname', 40)->nullable();
			$table->string('url', 100)->nullable();
			$table->string('location', 30)->nullable();
			$table->text('signature')->nullable();
			$table->integer('disp_topics')->nullable();
			$table->integer('disp_posts')->nullable();
			$table->integer('email_setting')->default(1); // TODO: Meh, pretty large for a TINYINT with three possible values
			$table->boolean('notify_with_post')->default(false);
			$table->boolean('auto_notify')->default(false);
			$table->boolean('show_smilies')->default(true);
			$table->boolean('show_img')->default(true);
			$table->boolean('show_img_sig')->default(true);
			$table->boolean('show_avatars')->default(true);
			$table->boolean('show_sig')->default(true);
			$table->float('timezone')->default(0);
			$table->boolean('dst')->default(false);
			// TODO: Integer for three values?
			$table->integer('time_format')->default(0);
			$table->integer('date_format')->default(0);
			// TODO: Use selected language here (retrieve from Lang class)
			// TODO: Too long?
			$table->string('language', 25)->default('en');
			// TODO: Use selected style here
			$table->string('style', 25)->default('Air');
			$table->integer('num_posts')->default(0);
			$table->integer('last_post')->nullable();
			$table->integer('last_search')->nullable();
			$table->integer('last_email_sent')->nullable();
			$table->integer('last_report_sent')->nullable();
			$table->integer('registered')->default(0);
			$table->string('registration_ip', 35)->default('0.0.0.0');
			$table->integer('last_visit')->default(0);
			$table->string('admin_note', 30)->nullable();
			$table->string('activate_string', 80)->nullable();
			$table->string('activate_key', 8)->nullable(); // TODO: A little short maybe?

			$table->primary('id');
			$table->unique('username');
			$table->index('registered');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}

}