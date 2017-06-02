    <h1>Utilisateurs</h1>
    <table class="table">
      <tr>
          <th>ID</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Email</th>
          <th>Address</th>
      </tr>
      
      <?php foreach ($users as $user) : ?>
      <tr>
          <td><?= $user->getId();?></td>
          <td><?= $user->getLastname();?></td>
          <td><?= $user->getFirstname();?></td>
          <td><?= $user->getEmail();?></td>
          <td><?= $user->getAddress();?></td>
      </tr>
      <?php endforeach; ?>
  </table>

