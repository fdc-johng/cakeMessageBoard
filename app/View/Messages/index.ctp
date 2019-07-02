<h1>Messages</h1>
<table>
    <tr>
        <th>id</th>
        <th>to_id</th>
        <th>from_id</th>
        <th>content</th>
        <th>created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($messages as $message): ?>
    <tr>
        <td><?php echo $message['Message']['id']; ?></td>
        <td><?php echo $message['Message']['to_id']; ?></td>
        <td><?php echo $message['Message']['from_id']; ?></td>
        <td>
            <?php echo $this->Html->link($message['Message']['content'],
array('controller' => 'messages', 'action' => 'view', $message['Message']['id'])); ?>
        </td>
        <td><?php echo $message['Message']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($message); ?>
</table>