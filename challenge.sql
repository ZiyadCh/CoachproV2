
1. select user_id,count(*) from coachs left join seances on coachs.user_id
= seances.coach_id  group by user_id;

2. select user_id,count(*) from coachs left join seances on coachs.user_id
= seances.coach_id where statut = 'reservee'  group by user_id;

3.

4.select user_id from coachs left join seances on coachs.user_id = seances.coach_id   group by user_id having count(*)>2;
