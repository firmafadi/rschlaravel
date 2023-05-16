
# Vtax-Mobile

Pelayanan mandiri untuk pajak melalui ponsel

## Change Log

- Version 1.0
```bash
    - fitur 1
    - fitur 2
```
- Live previews


## Configuration Variable

configuration file : /conf/tax-hitung-denda.xml

```bash
<penalty-percentage>2</penalty-percentage> <!-- persen denda -->
<penalty-max>24</penalty-max> <!-- maksimal bulan -->
<penalty-month>0</penalty-month> <!-- config perhitungan 0(bulan), 30, 31 -->
```


## Tech Stack

**Client:** React, Redux, TailwindCSS

**Server:** Node, Express


## Documentation

[Documentation](https://linktodocumentation)


## Acknowledgements

 - [Awesome Readme Templates](https://awesomeopensource.com/project/elangosundar/awesome-README-templates)
 - [Awesome README](https://github.com/matiassingers/awesome-readme)
 - [How to write a Good readme](https://bulldogjob.com/news/449-how-to-write-a-good-readme-for-your-github-project)


## API Reference

#### Get all items

```http
  GET /api/v1/payment/generate
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id_billing` | `string` | **Required**. id billing (ex: nop/kode bayar/dll) |
| `id_billing` | `string` | **Required**. id billing (ex: nop/kode bayar/dll) |

#### Get item

```http
  GET /api/items/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to fetch |

#### add(num1, num2)

Takes two numbers and returns the sum.


## Appendix

Any additional information goes here

