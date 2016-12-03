create user admincucei identified by "cucei";
GRANT ALL PRIVILEGES ON clonopolis.* TO admincucei;
create user usuario identified by "usuario";
GRANT SELECT ON clonopolis.* TO usuario;
create user empleado identified by "empleado";
GRANT SELECT ON clonopolis.* TO empleado;
GRANT INSERT ON clonopolis.boletos TO empleado;
