<form method="post" action="sendMail.php">
	<table border="1" width=500>
		<tbody>
			<tr>
				<th scope="row">To</th>
				<td><input type="text" name="to" maxlength="100" style="width:500px"/><br>
				(多個收件者請用","隔開)</td>
			</tr>
			<tr>
				<th scope="row">Subject</th>
				<td><input type="text" name="subject" maxlength="100"  style="width:500px"/></td>
			</tr>
			<tr>
				<th scope="row">Message</th>
				<td><pre><textarea rows="30" cols="80" name="message"></textarea></pre></td>
			</tr>
		</tbody>
	</table>
	<input type="submit" value="發送">
</form>
