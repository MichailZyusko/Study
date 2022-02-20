# FIRST TABLE

age <- table(DK$Age.Gr, DK$Count > 2)
age

age_median <- c(median(DK[which(DK$Count < 3), 1], na.rm = TRUE), median(DK[which(DK$Count > 2), 1], na.rm = TRUE))
age_median

age_comporation <- c(gsub("x", round(age[2,1]/(age[4,1] + age[5,1]), 2), "x:1"), gsub("x", round(age[2,2]/(age[4,2] + age[5,2]), 2), "x:1"))
age_comporation

age <- rbind(age, age_median)
age <- rbind(age, age_comporation)
age


#SECOND TABLE
sex <- table (DK$Sex, DK$Count > 2)
x <- which(DK$Age.Gr == "18-22")
sex_2 <- table (DK$Sex[x], DK$Count[x] > 2)
rm(x)

# sex <- rbind(sex, c(which(DK$Count > 2), which(DK$Age.Gr == "18-22" & DK$Count > 2)))

# Социальный статус

status <- table(DK$Status, DK$Count > 2)
status

# Проживание 

localization <- table(DK$Localization, DK$Count > 2)
localization

# Уровень дохода

Income <- table(DK$Income, DK$Count > 2)
Income

# Семейное положение: Мужчины

MaleMStatus <- table(DK$Mstatus, DK$Count > 2)
x <- which(DK$Sex == "муж")
MaleMStatus <- table(DK$Mstatus[x], DK$Count[x] > 2)
MaleMStatus
rm(x)

MaleFStatus <- table(DK$Mstatus, DK$Count > 2)
x <- which(DK$Sex == "жен")
MaleFStatus <- table(DK$Mstatus[x], DK$Count[x] > 2)
MaleFStatus
rm(x)


