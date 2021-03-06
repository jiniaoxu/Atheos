<div id="codegit_overview" class="content">
	<input type="text" id="commit_message" placeholder="Enter commit message here...">
	<button onclick="atheos.codegit.commit();">Commit</button>
	<table>
		<?php
		$repo = $CodeGit->getWorkspacePath($repo);
		$changes = $CodeGit->loadChanges($repo);
		$line = 0;
		?>

		<thead>
			<tr>
				<th><input type="checkbox" class="large" id="check_all"></th>
				<th>Status</th>
				<th>File</th>
				<th>
					<button class="git_button git_diff" data-line="<?php echo $line ?>">Diff</button>
					<button class="git_button git_undo" data-line="<?php echo $line ?>">Undo</button>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($changes as $key => $array) {
				if (is_array($array) && count($array) < 1) continue;
				foreach ($array as $file) {
					?>
					<tr data-file="<?php echo $file ?>">
						<td>
							<input type="checkbox" class="large" data-line="<?php echo $line ?>">
						</td>
						<td class="<?php echo $key ?>"><?php echo $key ?></td>
						<td data-line="<?php echo $line ?>" class="file"><?php echo $file ?></td>
						<td>
							<button class="git_button git_diff" data-line="<?php echo $line ?>">Diff</button>
							<button class="git_button git_undo" data-line="<?php echo $line ?>">Undo</button>
						</td>
					</tr>
					<?php
					$line++;
				}
			} ?>
		</tbody>
	</table>
</div>