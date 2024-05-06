### Requisitos funcionais
- [ ] Deve ser possível realizar o login
- [ ] Deve ser possível criar uma turma
- [ ] Deve ser possível criar uma disciplina
- [ ] Deve ser possível criar um professor ou estudante
- [ ] Deve ser possível dar feedback e comentar nos professores
- [ ] Deve ser possível diferenciar os usuários como SUPER-ADMIN, PROFESSOR E ESTUDANTE

### Regras de negócio
- [ ] Os usuários devem ser criados pelo SUPER-ADMIN
- [ ] O SUPER-ADMIN 
    - [ ] criar professores, estudantes, turma e disciplinas
    - [ ] adicionar professor a disciplina
    - [ ] adicionar professor a turma
    - [ ] adicionar estudante a turma
- [ ] O PROFESSOR não pode adicionar-se a uma disciplina e turma nem dar feedback, pode apenas ver seus feedbacks
- [ ] O ESTUDANTE pode dar feedback e comentar

### Requisitos não funcionais
- [ ] os usuário são dividos em SUPER-ADMIN, STUDENT e TEACHER
- [ ] Deve haver dashboards diferentes para cada tipo de usuário
    - [ ] ADMIN > dashboard que possui todas as permissões
    - [ ] TEACHER > dashboard que o permite ver as suas turmas, disciplinas, alunos e seus feedbacks
    - [ ] STUDENT > dashboard que o permite ver sua turma, estudantes (incluindo ele) e professores, além de conseguir realizar as ações de comentário e feeback
