
Challenge 1

1. select user_id,count(*) from coachs left join seances on coachs.user_id
= seances.coach_id  group by user_id;

2. select user_id,count(*) from coachs left join seances on coachs.user_id
= seances.coach_id where statut = 'reservee'  group by user_id;

3.select user_id, (count(*)/ (select count(*) from seances) * 100) as '%' from coachs left join seances on coachs
.user_id = seances.coach_id group by user_id;

4.select user_id from coachs left join seances on coachs.user_id = seances.coach_id   group by user_id having count(*)>2;

Chllange 2

5.select nom,prenom from users right join sportifs on users.id = sportifs.user_id;

6. select nom,prenom,count(*),date_format(reserved_at,'%m') from users left join sportifs on users.id = sportifs.user_id right join reservations on sportifs.user_id = reservations.sportif_id group by date_format(reserved_at,'%m'),sportif_id;

7.select nom,prenom,count(*) as reservations,date_format(reserved_at,'%m') as mois,date_format(reserved_at,'%y') as anne from users left join sportifs on users.id = sportifs.user_id right join reservations on sportifs.user_id = rese
rvations.sportif_id group by date_format(reserved_at,'%m'),sportif_id;

8. select nom,prenom,count(*) as reservations from users right join sportifs on users.id = sportifs.user_id right join reservations on sportifs.user_id = reservations.sportif_id group by sportifs.user_id order by reservations desc;
