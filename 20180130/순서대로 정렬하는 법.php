
/* 제품 목록 상세(판매순) */
create view data_detail as
SELECT 	d.*,
		sum(r.quantity) as quantity_sum,
        count(r.product) as product_cnt,
        m.age
FROM 	data d /*data를 d로 쓰겠다*/
join 	reserve r on d.product = r.product
join 	member m on r.name = m.name
GROUP by d.product

/* 연령대별 */
create view data_age_group
SELECT 	floor(m.age/10)*10 as age2,
        sum(r.quantity) as q_sum,
        count(r.product) as p_cnt,
        d.*
FROM 	`reserve` r
join 	member m on	r.name = m.name
join 	data d on d.product = r.product
group by age2, r.product
having  age2 = 10
order by q_sum desc

/* 	mysql일 경우
	sum(테이블.컬럼) == 테이블의 칼럼의 값의 합,
	count(테이블.컬럼) == 테이블의 칼럼의 갯수,
	order by 컬럼 == 컬럼의 순서대로 나열 (desc는 내림차순)
	JOIN 테이블 ON 테이블1.컬럼=테이블2.컬럼 */