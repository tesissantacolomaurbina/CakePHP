<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $book
 */
?>

<div class="container">
    <div class="text-center py-5">
        <h2 class="text-center py-5"> Biblioteca</h2>
        <form class="form-inline mb-5">
            <div class="ml-auto mr-auto">
                <?= $this->Html->link(__('Crear'), ['action' => 'add'], ['class' => 'btn btn btn-primary my-2 my-sm-0']) ?>
                <!-- <a href="book/" class="btn btn btn-primary my-2 my-sm-0" role="button">Crear</a> -->
            </div>
        </form>
    <div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Autor</td>
                <td>Titulo</td>
                <td>Isbn</td>
                <td>Editorial</td>
                <td>Año de Publicacion</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $this->Number->format($book->id) ?></td>
                    <td><?= h($book->author_id) ?></td>
                    <!-- <td><?= $book->has('author') ? $this->Html->link($book->author->name, ['controller' => 'Author', 'action' => 'view', $book->author->id]) : '' ?></td> -->
                    <td><?= h($book->name) ?></td>
                    <td><?= h($book->isbn) ?></td>
                    <td><?= h($book->editorial) ?></td>
                    <td><?= h($book->publish_year) ?></td>
                    <td class="actions">
                        <!-- <?= $this->Html->link(__('Ver'), ['action' => 'view', $book->id]) ?> -->
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $book->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


