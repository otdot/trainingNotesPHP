/* create user database */

/* insert username and password to user database */

/* create database for user and link programId and programInfo */
/* select program and starting weights */

INSERT into elaston values(1, "Squat", 5, 5, 0, "a", 1);
INSERT into elaston values(2, "Bench Press", 6, 4, 0, "b", 1);
INSERT into elaston values(3, "Over Head Press", 6, 4, 0, "c", 1);
INSERT into elaston values(4, "Triceps", 6, 3, 0, "d", 1);
INSERT into elaston values(5, "Sit Ups", null, 4, 0, "e", 1);

INSERT into elaston values(6, "Deadlift", 5, 5, 1, "a", 2);
INSERT into elaston values(7, "Pull Up", 6, 3, 1, "b", 2);
INSERT into elaston values(8, "Bent-over Row ", 6, 3, 1, "c", 2);
INSERT into elaston values(9, "Biceps", 6, 3, 1, "d", 2);
INSERT into elaston values(10, "Back row", 6, 2, 1, "e", 2);
INSERT into elaston values(11, "Calves standing", 6, 4, 1, "f", 2);

INSERT into elaston values(12, "Leg Press", 8, 3, 2, "a", 3);
INSERT into elaston values(13, "Thighs", 8, 3, 2, "b", 3);
INSERT into elaston values(14, "Incline Bench Press", 8, 4, 2, "c", 3);
INSERT into elaston values(15, "Shoulders standing", 8, 4, 2, "d", 3);
INSERT into elaston values(16, "Triceps", 8, 3, 2, "e", 3);
INSERT into elaston values(17, "Abs hanging", null, 3, 2, "f", 3);

INSERT into elaston values(18, "Hamstrings", 8, 5, 3, "a", 4);
INSERT into elaston values(19, "Low Pulley", 8, 3, 3, "b", 4);
INSERT into elaston values(20, "High Pulley", 8, 3, 3, "c", 4);
INSERT into elaston values(21, "Biceps", 8, 3, 3, "d", 4);
INSERT into elaston values(22, "Back flye", 8, 2, 3, "e", 4);
INSERT into elaston values(23, "Calves sitting", 8, 4, 3, "f", 4);


create table $name(
        trainingId integer not null primary key,
        a decimal(5,2),
        b decimal(5,2),
        c decimal(5,2),
        d decimal(5,2),
        e decimal(5,2),
        f decimal(5,2),
        lastsession date,
        repa integer,
        repb integer,
        repc integer,
        repd integer,
        repe integer,
        repf integer,
      );

insert into $name values(1, 0, 0, 0, 0, 0, 0, null, null, null, null, null, null, null);
insert into $name values(2, 0, 0, 0, 0, 0, 0, null, null, null, null, null, null, null);
insert into $name values(3, 0, 0, 0, 0, 0, 0, null, 8, 8, 8, 8, 8, 8);
insert into $name values(4, 0, 0, 0, 0, 0, 0, null, 8, 8, 8, 8, 8, 8);
insert into $name values(5, 0, 0, 0, 0, 0, 0, null, null, null, null, null, null, null);




create table `arnold`(
    practiceId integer not null primary key,
    practice varchar(20) not null,
    reps integer not null,
    sets integer not null,
    weightId integer not null,
    weightColumn varchar(20),
    trainingNumber integer not null
)


INSERT into arnold values(1, "Squat", 10, 4, 4, "a", 5);
INSERT into arnold values(2, "Bench Press", 10, 3, 4, "b", 5);
INSERT into arnold values(3, "Pull ups", 10, 3, 4, "c", 5);
INSERT into arnold values(4, "Over Head Press", 10, 4, 4, "d", 5);
INSERT into arnold values(5, "Biceps", 10, 3, 4, "e", 5);
INSERT into arnold values(6, "Sit Ups", 10, 3, 4, "f", 5);



create table users(
  name varchar(20) not null,
  password varchar(200) not null,
  userId integer primary key AUTO_INCREMENT
);


INSERT into users values("USER", "PASS", null);
INSERT into users values("USER2", "PASS2", null);

select * from users where 
