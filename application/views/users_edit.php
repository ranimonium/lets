<div id="main-content">
    <div class="segment">
        <div class="greeting">
            USER
            <a class="side-link" href="#">[Edit]</a>
        </div>
            <?php foreach ($user) { ?>
				<tr>
					<td><?php echo $user->username ?></td>
					<td><?php echo $user->password ?></td>
                    <td><?php echo $about->about ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>