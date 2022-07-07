<!-- Conteúdo da página -->
<div class="container mt-2">
    <h1>Lista de Usuários</h1>
    <hr>
    <a href="<?= base_url() . "?c=usuario&m=add"?>" class="btn btn-success">Inserir Usuário</a>
    <table class="table table-hover table-responsive">
        <tbody>
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php foreach($usuarios as $usuario):?>
            <tr>
                <td><?php echo $usuario['login']; ?></td>
                <td>
                    <a href="<?= base_url() ?>?c=usuario&m=excluir&id=<?= $usuario['idusario']; ?>" class="btn btn-danger" title="Excluir"><i class="fa-solid fa-trash-can"></i></a>
                    <a href="<?= base_url() ?>?c=usuario&m=editar&id=<?= $usuario['idusario']; ?>" class="btn btn-primary" title="Atualizar"><i class="fa-solid fa-pencil"></i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>