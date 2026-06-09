IFPI - Instituto Federal do Piauí - CAMPUS - Teresina Central
CURSO: Técnico em Desenvolvimento de Sistemas, TURMA - 286
DISCIPLINA: Banco de Dados.
DOCENTE: Fabio de Jesus Lima Gomes.
DISCENTE: Rodrigo da Silva Leite MATRÍCULA: 2025211MTDS0054

                                        Trabalho Final da Disciplina
                                        Sistema de Acadêmia - CRUD

Conceito:
    Uma academia de ginástica deseja manter um controle do seu funcionamento. Os alunos são
    organizados em turmas associadas a um tipo específico de atividade. As informações sobre uma
    turma são número de alunos, horário da aula, duração da aula, data inicial, data final e tipo de
    atividade. Cada turma é orientada por um único instrutor para o qual são cadastrados RG, nome,
    data de nascimento, titulação e telefone. Um instrutor pode orientar várias turmas que podem ser
    de diferentes atividades. Para cada turma existe um aluno monitor que auxilia o instrutor da turma,
    sendo que um aluno pode ser monitor no máximo em uma turma. Os dados cadastrados dos
    alunos são: matrícula, data de matrícula, nome, endereço, telefone, data de nascimento, altura e
    peso. Um aluno pode estar matriculado em várias turmas se deseja realizar atividades diferentes e
    para cada matrícula é mantido um registro das ausências do aluno.
    
Tabelas:

    Turma:
        Codigo da Turma - Tipo Char(3), (chave primaria)
        Número de Alunos - Tipo inteiro, numero maximo de 40.
        Horário das Aulas - Tipo Time.
        Data Inicial - Tipo Date.
        Data Final - Tipo Date.
        Tipo de Atividade - Codigo Atividade (1-n).
        Instrutor - Matricula Instrutor.
        Aluno Monitor - Matricula Monitor.
        Aluno - Matricula Aluno (1-n).
        
    Aluno:
        Matrícula  - Tipo Char(6), (chave primária)
        Data da Matrícula - Tipo Date.
        Nome - Tipo Varchar(30).
        Endereço - Tipo Varchar(30).
        Telefone - Char(11). (1 - 2).
        Data de Nascimento - Tipo Date.
        Altura - Decimal(1.2).
        Peso - Decimal(3.2).
        
        
        
        
    
        

    
