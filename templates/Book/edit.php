<div class="container d-flex align-items-center justify-content-center">
        <div class="row text-center pt-5">
            <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h1 class="h3 mb-3 font-weight-normal py-2">Editar Libro</h1>
                <hr/>

                <?php
                    echo $this->Form->create($book);
                    ?>
                     <div class="form-group">
                        <label for="name">Titulo</label>
                        <?php echo $this->Form->input('name', ['class' => 'form-control', 'placeholder' => 'Andres']); ?>
                        <!-- <input type="text" class="form-control" name="name" placeholder="Titulo"> -->
                    </div>
                    <div class="form-group">
                    <label for="name">Isbn</label>
                        <?php echo $this->Form->input('isbn', ['class' => 'form-control', 'placeholder' => '12345']); ?>
                        <!-- <input type="text" class="form-control" name="isbn" placeholder="12345"> -->
                    </div>
                    <div class="form-group">
                    <label for="name">Editorial</label>
                        <?php echo $this->Form->input('editorial', ['class' => 'form-control', 'placeholder' => 'Maya']); ?>
                        <!-- <input type="text" class="form-control" name="editorial" placeholder="Maya"> -->
                    </div>
                    <div class="form-group">
                    <label for="name">Ano publicacion</label>
                        <?php echo $this->Form->input('publish_year', ['class' => 'form-control', 'placeholder' => '2019']); ?>
                        <!-- <input type="text" class="form-control" name="publish_year" placeholder="2019"> -->
                    </div>

                    <div class="form-group">
                    <label for="name">Author</label>
                         <?php echo $this->Form->select('author_id', ['options' => $authors ]); ?>   
                        <!-- <input type="text" class="form-control" name="publish_year" placeholder="2019"> -->
                    </div>
                    <?php
                    echo $this->Form->button('Editar', ['class' => 'btn btn-primary']); 
                    echo $this->Form->end();               
                ?>
            </div>
        </div>
    </div>
    </div>