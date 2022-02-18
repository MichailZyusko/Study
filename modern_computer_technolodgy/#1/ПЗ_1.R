df <- data.frame(C1=c(11,21,31), C2=c(12,22,32), C3=c(13,23,33), C4=c(14,24,34), row.names=c("R1", "R2", "R3"))
# 1
r1 <- df[1,  1:2 ]
r1
# 2
r3 <- df[3, ]
r3[which(r3 > 32)]
# 3
c3 <- df[ ,3]
c3[which(c3 > 12)]
# 4
colnames(df) <- c("col1", "C2", "col3", "C4")
df
# 5
df["CX"] <- c(-1, 0, 1)
df
# 6
df.without_2 <- df[-2, ]
df.without_2
# 7
df[2] <- df[2]^3
df
# 8
df[3] <- df[3]^df["CX"]
df

#########################################
#########################################
#########################################

students <- data.frame(
       "lastName" = c("Борисевич", "Работа", "Мацевило", "Скабенко", "Карпович", "Самуйлик", "Зюсько", "Пашкевич", "Хвалько", "Южикевич"),
       "firstName" = c("Александр", "Юрий", "Даниил", "Влад", "Влад", "Артем", "Михаил", "Роман", "Леха", "РУслан"),
       "gender" = c("м", "ж", "м", "ж", "ж", "ж", "м", "м", "ж", "м"),
       "b-day" = c("17.02.2001", "17.02.2002", "17.02.2003", "17.02.2004", "17.02.2005", "17.02.2006", "17.02.2007", "17.02.2008", "17.02.2009", "17.02.2010"),
       "height" = seq(150, 195, 5),
       "weight" = seq(50, 95, 5))

# 1
gender_info <- factor(students$gender)
summary(gender_info)

#2
name_info <- factor(students$firstName)
summary(name_info)

#3
students["full_year"] <- round(difftime(Sys.Date(), as.Date(students$b.day, format = "%d.%m.%Y"),  "years") / 365, 0)
students