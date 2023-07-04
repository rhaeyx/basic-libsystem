with open('books.csv', 'r') as f:
    lines = f.readlines()

i = 1
for line in lines:
    values = [ word.strip() for word in line.split(',') ]
    id = values[0][:2].upper().replace(' ', '-') + values[1][:3].upper() + values[2] + "-" + values[3][:3].upper() + str(i).rjust(5, '0')
    i += 1
    
    print(f"('{id}', '{values[0]}', '{values[1]}', '{values[2]}', '{values[3]}'),")