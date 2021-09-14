<?php

$dateNow = new \DateTime();
$dateNow->sub(new \DateInterval("P2D"));
$dateNow = $dateNow->format("d-m-Y");



if (!copy("deliveries_all_time.csv", "save/deliveries_all_time/$dateNow.csv")) {}

if (!copy("deliveries_perform.csv", "save/deliveries_perform/$dateNow.csv")) {}

if (!copy("deliveries_reg_perform.csv", "save/deliveries_reg_perform/$dateNow.csv")) {}

if (!copy("hosp.csv", "save/hosp/$dateNow.csv")) {}

if (!copy("incidence.csv", "save/incidence/$dateNow.csv")) {}

if (!copy("place_vac.csv", "save/place_vac/$dateNow.csv")) {}

if (!copy("vaccin_age_total.csv", "save/vaccin_age_total/$dateNow.csv")) {}

if (!copy("vaccin_day.csv", "save/vaccin_day/$dateNow.csv")) {}

if (!copy("vaccin_dep_total.csv", "save/vaccin_dep_total/$dateNow.csv")) {}

if (!copy("vaccin_reg_age_total.csv", "save/vaccin_reg_age_total/$dateNow.csv")) {}

if (!copy("vaccin_reg_day.csv", "save/vaccin_reg_day/$dateNow.csv")) {}

if (!copy("vaccin_reg_sex_total.csv", "save/vaccin_reg_sex_total/$dateNow.csv")) {}

if (!copy("vaccin_res_total.csv", "save/vaccin_res_total/$dateNow.csv")) {}

if (!copy("vaccin_total.csv", "save/vaccin_total/$dateNow.csv")) {}

if (!copy("vaccin_type_total.csv", "save/vaccin_type_total/$dateNow.csv")) {}