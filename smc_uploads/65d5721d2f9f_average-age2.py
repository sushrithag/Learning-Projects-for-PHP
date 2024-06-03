t = int(input("Total number of Persons:"))
num = 0
age_sum = 0
age_list = []
if t > 0:
    for i in (0,t-1):
        num = num + 1
        age = int(input("Age of " + str(num) + " Person:"))
        age_list.append(age)
    for j in age_list:
        age_sum = age_sum + j
    avg = age_sum / t
    print("The Average of", t, "persons is ", avg)
else:
    print("Error: Enter a positive value of number of persons whose average age is needed to be calculated")
