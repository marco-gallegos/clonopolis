create user admincucei identified by "cucei";
GRANT ALL PRIVILEGES ON clonopolis.* TO admincucei;
create user empleado identified by "empleado";
GRANT SELECT ON clonopolis.* TO empleado;
GRANT INSERT ON clonopolis.boletos TO empleado;
